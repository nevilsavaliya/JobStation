<html>
<body>
<script>
    function readMessages() {
        event.preventDefault()

        const form = event.target
        const formData = new FormData(form)

        const ajax = new XMLHttpRequest()
        ajax.open("POST", "get-messages.php", true)
        ajax.onreadystatechange = async function () {
            if (this.readyState == 4 && this.status == 200) {
                const response = JSON.parse(this.responseText)

                const publicKeyObj = await window.crypto.subtle.importKey(
                    "jwk",
                    JSON.parse(response.publicKey),
                    {
                        name: "ECDH",
                        namedCurve: "P-256",
                    },
                    true,
                    []
                )

                const privateKeyObj = await window.crypto.subtle.importKey(
                    "jwk",
                    JSON.parse(response.privateKey),
                    {
                        name: "ECDH",
                        namedCurve: "P-256",
                    },
                    true,
                    ["deriveKey", "deriveBits"]
                )

                const derivedKey = await window.crypto.subtle.deriveKey(
                    { name: "ECDH", public: publicKeyObj },
                    privateKeyObj,
                    { name: "AES-GCM", length: 256 },
                    true,
                    ["encrypt", "decrypt"]
                )

                for (let a = 0; a < response.messages.length; a++) {
                    const iv = new Uint8Array(atob(response.messages[a].iv).split("").map(function(c) {
                        return c.charCodeAt(0)
                    }))
                    const initializationVector = new Uint8Array(iv).buffer
                    const string = atob(response.messages[a].message)
                    const uintArray = new Uint8Array(
                        [...string].map((char) => char.charCodeAt(0))
                    )
                    const decryptedData = await window.crypto.subtle.decrypt(
                        {
                            name: "AES-GCM",
                            iv: initializationVector,
                        },
                        derivedKey,
                        uintArray
                    )
                    const message = new TextDecoder().decode(decryptedData)
                    console.log(message)
                }
            }
        }

        ajax.send(formData)
    }
</script>
<form onsubmit="readMessages()" id="form-read">
    <input type="email" name="sender" placeholder="Sender email" />
    <input type="email" name="receiver" placeholder="Receiver email" />
    <input type="submit" value="Read" />
</form>
</body>
</html>