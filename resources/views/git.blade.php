<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Cambios</title>
</head>
<body>
    <h1>Automatización de Cambios</h1>
    <button id="saveChanges">Guardar Cambios</button>

    <script>
        document.getElementById("saveChanges").addEventListener("click", async () => {
            const response = await fetch("/git-push", { method: "POST" });
            const result = await response.json();
            alert(result.output);
        });
    </script>
</body>
</html>
