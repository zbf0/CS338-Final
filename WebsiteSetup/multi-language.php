<?php

//Create PHP Function for Translation

function getTranslation($originalText, $languageCode) {
    global $dbConnection;
    $query = "SELECT TranslatedText FROM Translations t
              JOIN Languages l ON t.LanguageID = l.LanguageID
              WHERE OriginalText = ? AND l.LanguageCode = ?";
    $stmt = $dbConnection->prepare($query);
    $stmt->bind_param("ss", $originalText, $languageCode);
    $stmt->execute();
    $stmt->bind_result($translatedText);
    if ($stmt->fetch()) {
        return $translatedText;
    } else {
        return $originalText; // Return the original text if no translation is found
    }
}


?>