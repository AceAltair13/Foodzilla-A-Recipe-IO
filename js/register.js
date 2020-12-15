function a() {
  const firebaseConfig = {
    apiKey: "AIzaSyA0wVImm3QGscOD1ReGbzue1wa9kkd0_GI",
    authDomain: "foodzilla-io.firebaseapp.com",
    databaseURL: "https://foodzilla-io.firebaseio.com",
    projectId: "foodzilla-io",
    storageBucket: "foodzilla-io.appspot.com",
    messagingSenderId: "37041438374",
    appId: "1:37041438374:web:5c311410b4fcadf823fe67",
    measurementId: "G-KB47CLWNSE"
  };

  if (firebase.apps.length === 0) {
    firebase.initializeApp(firebaseConfig);
  }

  var username = document.getElementById("inputUsername").value;
  var email = document.getElementById("inputEmail").value;
  var password = document.getElementById("inputPassword").value;
  var repassword = document.getElementById("reinputPassword").value;
  var ans = /[A-Z]/.test(password) && /[0-9]/.test(password) && /[a-z]/.test(password) && /[^a-zA-Z0-9]/.test(password);
  var flag = 0;
  var flag_1 = 0;
  var flag_2 = 0;
  if ((email == "") || (password == "") || (repassword == "") || (username == "")) {
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
  else if (((ans == false) || (password.length <= 8)) && (flag == 0)) {
    Swal.fire({
      text: `.Password Length Should Be Greater Than 8
        .Password Should Contain At Least A digit
        , A Upper Case Letter
        , A Small Case Letter
        And Special Character`,
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    })
    flag_1 = 1;
  }
  else if ((repassword != password) && (flag_1 == 0)) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Password does not match',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    })
  }
  else {
    firebase.auth().createUserWithEmailAndPassword(email, password).then(function (user) {
      var user = firebase.auth().currentUser;

      user.updateProfile({
        displayName: username
      }).then(function () {
      }).catch(function (error) {
      });


      firebase.auth().currentUser.sendEmailVerification().then(function () {
        Swal.fire({
          text: 'Please check your mail for conformation',
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        })

      }).catch(function (error) {


      });

    }).catch(function (error) {
      console.log("message is  :", error.message)
      console.log("message is  :", error.code)
      if (error.code == "auth/invalid-email") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please Enter valid email',
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        })
      }
      if (error.code == "auth/email-already-in-use") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Email address alreday in use',
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        })
      }
    });




  }


}

