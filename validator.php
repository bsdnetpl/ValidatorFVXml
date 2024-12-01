<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walidacja Faktury XML</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Walidacja Faktury XML</h1>
        
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="xmlFile" class="form-label">Wybierz plik XML</label>
                <input class="form-control" type="file" name="xmlFile" id="xmlFile" required>
            </div>
            <button type="submit" name="validate" class="btn btn-primary">Waliduj</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['xmlFile'])) {
            $uploadedFile = $_FILES['xmlFile']['tmp_name'];
            $schemaFile = 'schemat.xsd'; // Ścieżka do pliku schematu XSD
            
            if (file_exists($uploadedFile) && file_exists($schemaFile)) {
                libxml_use_internal_errors(true); // Włącz przechwytywanie błędów

                $dom = new DOMDocument();
                $dom->load($uploadedFile);
                
                if ($dom->schemaValidate($schemaFile)) {
                    echo '<div class="alert alert-success mt-4">Plik XML jest poprawny względem schematu XSD.</div>';
                } else {
                    echo '<div class="alert alert-danger mt-4">Plik XML jest niezgodny z schematem XSD.</div>';
                    
                    // Pobierz szczegółowe błędy
                    $errors = libxml_get_errors();
                    if (!empty($errors)) {
                        echo '<ul class="list-group mt-3">';
                        foreach ($errors as $error) {
                            echo '<li class="list-group-item list-group-item-danger">';
                            echo formatXmlError($error);
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    
                    libxml_clear_errors(); // Wyczyść błędy po ich wyświetleniu
                }
            } else {
                echo '<div class="alert alert-warning mt-4">Nie znaleziono pliku XML lub schematu XSD.</div>';
            }
        }

        // Funkcja do formatowania błędów XML
        function formatXmlError($error) {
            $errorTypes = [
                LIBXML_ERR_WARNING => 'Warning',
                LIBXML_ERR_ERROR => 'Error',
                LIBXML_ERR_FATAL => 'Fatal Error'
            ];

            $type = $errorTypes[$error->level] ?? 'Unknown';
            $line = $error->line ?? 'N/A';
            $column = $error->column ?? 'N/A';

            return "{$type} at line {$line}, column {$column}: {$error->message}";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
