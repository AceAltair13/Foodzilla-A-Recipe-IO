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

    if (firebase.apps.length === 0) {
        firebase.initializeApp(firebaseConfig);
    }

    var email = document.getElementById("inputEmail").value;
    console.log(email);
    var password = document.getElementById("inputPassword").value;
    // Initialize Firebase
    firebase.auth().signInWithEmailAndPassword(email, password).then(function () {
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                // User is signed in.
                var displayName = user.displayName;
                var email = user.email;
                var emailVerified = user.emailVerified;
                if (emailVerified == false) {
                    console.log("account does not exist");
                }
                var photoURL = user.photoURL;
                var isAnonymous = user.isAnonymous;
                var uid = user.uid;
                var providerData = user.providerData;
                console.log(displayName, " ", email, " ", emailVerified, " ", photoURL, " ", isAnonymous, " ", uid, " ", providerData);
                window.location.replace("dashboard.html");
                // ...
            } else {
                // User is signed out.
                // ...
            }
        });
    }).catch(function (error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // console.log(errorCode, " ", errorMessage);
        // ...
    });
}