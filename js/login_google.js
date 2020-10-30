function b() {
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
    /* google signin with popup */

    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function (result) {
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
        //   if (result.credential) {
        //     var token = result.credential.accessToken;
        //     var user = result.user;
        //     console.log(user);
        //   }
    }).catch(function (error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        console.log(errorCode, " ", errorMessage, " ", email, " ", credential);
    });
}