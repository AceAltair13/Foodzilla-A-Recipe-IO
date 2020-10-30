function a() {

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyDqwuPQtTPvkSKYXa-fH2QS7w9_hgnCUBo",
        authDomain: "mini-7ce45.firebaseapp.com",
        databaseURL: "https://mini-7ce45.firebaseio.com",
        projectId: "mini-7ce45",
        storageBucket: "mini-7ce45.appspot.com",
        messagingSenderId: "244958992191",
        appId: "1:244958992191:web:bac7474f876607b02c658a",
        measurementId: "G-398CY226WY"
    };
    // Initialize Firebase
    if (firebase.apps.length === 0) {
        firebase.initializeApp(firebaseConfig);
    }

    var username = document.getElementById("inputUsername").value;
    var email = document.getElementById("inputEmail").value;
    console.log(email);
    var password = document.getElementById("inputPassword").value;
    var repassword = document.getElementById("reinputPassword").value;
    console.log(password, " ", repassword, " ", password.length);
    var ans = /[A-Z]/.test(password) && /[0-9]/.test(password) && /[a-z]/.test(password) && /[^a-zA-Z0-9]/.test(password);
    console.log(ans);
    var flag = 0;
    var flag_1 = 0;
    var flag_2 = 0;
    if ((ans == false) && (password.length <= 8) && (flag == 0)) {
        console.log(flag);
        alert("password doesnot statisfy the given condition");
        flag_1 = 1;
    }
    else if ((repassword != password) && (flag_1 == 0)) {
        console.log(flag_1);
        alert("password doesnot match");
    }
    else {
        console.log(flag_1);
        //   alert("password has been changed");
        firebase.auth().createUserWithEmailAndPassword(email, password).then(function (user) {

            firebase.auth().currentUser.sendEmailVerification().then(function () {
                alert('Check Your Mail For Verfication');
                window.location.reload();

            }).catch(function (error) {
                alert("an error has occured");
            });

        }).catch(function (error) {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(error);
        });




    }


}

