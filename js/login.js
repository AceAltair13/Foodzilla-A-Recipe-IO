function a() {

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

    var email = document.getElementById("inputEmail").value;
    var password = document.getElementById("inputPassword").value;

    if ((email == "") || (password == "")) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please complete the form!!!',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }

    firebase.auth().signInWithEmailAndPassword(email, password).then((user) => {
        firebase.auth().onAuthStateChanged((user) => {
            if (user) {
                var emailVerified = user.emailVerified;
                if (emailVerified == false) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Invalid credentials',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }
                else {
                    var displayName = user.displayName;
                    var email = user.email;
                    document.cookie = "username=" + displayName;
                    document.cookie = "email=" + email;
                    Swal.fire({
                        icon: 'success',
                        text: 'Login Successful!',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },

                    }).then(function () {
                        window.location.replace("dashboard.php");
                    })
                }
            }
        })


    })
        .catch((error) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid credentials',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        });
}