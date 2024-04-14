<html>
<body>
<script>
    function doLogin() {
        event.preventDefault()

        const form = event.target
        const formData = new FormData(form)

        const ajax = new XMLHttpRequest()
        ajax.open("POST", "login.php", true)
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (!this.responseText) {
                    updateKeys()
                }
            }
        }

        ajax.send(formData)
    }
    async function updateKeys() {
        const keyPair = await window.crypto.subtle.generateKey(
            {
                name: "ECDH",
                namedCurve: "P-256",
            },
            true,
            ["deriveKey", "deriveBits"]
        )

        const publicKeyJwk = await window.crypto.subtle.exportKey(
            "jwk",
            keyPair.publicKey
        )

        const privateKeyJwk = await window.crypto.subtle.exportKey(
            "jwk",
            keyPair.privateKey
        )

        const formData = new FormData()
        formData.append("email", document.getElementById("email").value)
        formData.append("publicKey", JSON.stringify(publicKeyJwk))
        formData.append("privateKey", JSON.stringify(privateKeyJwk))

        const ajax = new XMLHttpRequest()
        ajax.open("POST", "update-keys.php", true)
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
            }
        }
        ajax.send(formData)
    }
</script>
<form onsubmit="doLogin(this)">
    <input type="email" name="email" id="email" placeholder="Enter email" />
    <input type="submit" value="Login"/>
</form>
</body>
</html>