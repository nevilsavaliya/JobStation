<html>
<body>
<script>
    let publicKey = ""
    let privateKey = ""
    function sendMessage() {
        event.preventDefault()

        if (publicKey == "" || privateKey == "") {
            const form = event.target
            const formData = new FormData(form)

            const ajax = new XMLHttpRequest()
            ajax.open("POST", "get-keys.php", true)
            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const response = JSON.parse(this.responseText)
                    privateKey = JSON.parse(response[0])
                    publicKey = JSON.parse(response[1])
                    doSendMessage()
                }
            }

            ajax.send(formData)
        } else {
            doSendMessage()
        }
    }
    async function doSendMessage() {
        const form = document.getElementById("form-message")
        const formData = new FormData()
        formData.append("sender", form.sender.value)
        formData.append("receiver", form.receiver.value)

        const publicKeyObj = await window.crypto.subtle.importKey(
            "jwk",
            publicKey,
            {
                name: "ECDH",
                namedCurve: "P-256",
            },
            true,
            []
        )

        const privateKeyObj = await window.crypto.subtle.importKey(
            "jwk",
            privateKey,
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

        const encodedText = new TextEncoder().encode(form.message.value)
        const iv = new TextEncoder().encode(new Date().getTime())
        const encryptedData = await window.crypto.subtle.encrypt(
            { name: "AES-GCM", iv: iv },
            derivedKey,
            encodedText
        )
        const uintArray = new Uint8Array(encryptedData)
        const string = String.fromCharCode.apply(null, uintArray)
        const base64Data = btoa(string)
        const b64encodedIv = btoa(new TextDecoder("utf8").decode(iv))

        formData.append("message", base64Data)
        formData.append("iv", b64encodedIv)

        const ajax = new XMLHttpRequest()
        ajax.open("POST", "send-message.php", true)
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
            }
        }

        ajax.send(formData)
    }
</script>
<form onsubmit="sendMessage()" id="form-message">
    <input type="email" name="sender" placeholder="Sender email" />
    <input type="email" name="receiver" placeholder="Receiver email" />
    <textarea name="message" placeholder="Message"></textarea>
    <input type="submit" value="Send" />
</form>
</body>
</html>