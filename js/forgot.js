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

    var email = document.getElementById("inputemail").value;
    if (email != "") {
        firebase.auth().sendPasswordResetEmail(email).then(function () {
            Swal.fire({
                text: 'Please check your mail for resetting password',
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                }
              })
      
        }).catch(function (error) {
        })
    }
    else {
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

}