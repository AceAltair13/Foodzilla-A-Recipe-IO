function b() {
    const firebaseConfig = {
        apiKey: "AIzaSyA0wVImm3QGscOD1ReGbzue1wa9kkd0_GI",
        authDomain: "foodzilla-io.firebaseapp.com",
        projectId: "foodzilla-io",
        storageBucket: "foodzilla-io.appspot.com",
        messagingSenderId: "37041438374",
        appId: "1:37041438374:web:5c311410b4fcadf823fe67",
        measurementId: "G-KB47CLWNSE"
    };

    if (firebase.apps.length === 0) {
        firebase.initializeApp(firebaseConfig);
    }


    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function (result) {
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                var displayName = user.displayName;
                var email = user.email;
                document.cookie = "username=" + displayName;
                document.cookie = "email=" + email;
                Swal.fire({
                    icon: 'success',
                    text: 'Sucessfull login',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },

                }).then(function () {
                    window.location.replace("dashboard.php");
                });
            } else {
            }
        });
    }).catch(function (error) {
    });
}