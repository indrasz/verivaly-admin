<!-- Plugins Js -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bundle.js"></script>

<!-- Active JS -->
<script src="/assets/js/settings.js"></script>
<script src="/assets/js/scrool-bar.js"></script>
<script src="/assets/js/todo-list.js"></script>
<script src="/assets/js/default-assets/active.js"></script>
<!-- Inject JS -->
<script src="/assets/js/default-assets/mini-event-calendar.min.js"></script>
<script src="/assets/js/default-assets/mini-calendar-active.js"></script>
<script src="/assets/js/default-assets/apexchart.min.js"></script>
<script src="/assets/js/default-assets/dashboard-active.js"></script>

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyCfbnT6teL7jUr2J4Tf0V7Ktz7FFrWTfcY",
    authDomain: "very-vali.firebaseapp.com",
    projectId: "very-vali",
    storageBucket: "very-vali.appspot.com",
    messagingSenderId: "976664971480",
    appId: "1:976664971480:web:2da9180d52120fcc896fad",
    measurementId: "G-WPK2EXJHMC"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
