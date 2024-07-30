document.getElementById('languageSelector').addEventListener('change', function() {
    var selectedLanguage = this.value;
    document.cookie = "language=" + selectedLanguage + "; path=/";
    location.reload();
});

//Update PHP to Use Selected Language

// Get the selected language from cookies
$languageCode = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en';

