
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', function (e) {
        e.preventDefault();
        var email = document.getElementById('email-address').value;
        var amount = parseFloat(document.getElementById('amount').value);
        if (!email || isNaN(amount) || amount <= 0) {
            alert('Please enter a valid email address and amount.');
            return;
        }
        payWithZest(email, amount);
    });

    function payWithZest(email, amount) {
        var handler = ZestPayPop.setup({
            key: "PK_G7zj4XkFMMW2FthaNim1SA447gBSrSvE", // Replace with your public key
            email: email,
            amount: amount * 100, // Convert amount to cents
            onClose: function () {
                console.log("Window closed.");
            },
            callback: function (response) {
                window.location = "http://?ref=" + response.reference;
            }
        });
        handler.openIframe();
    }
