<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de materiais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<main>
    <h1 class="text-center mt-md-2">Calculadora de Materiais</h1>

    <div class="container">
        <div class="row g-2">
            <fildset class="row g-2">
                <legend>Comôdo</legend>
                <div class="col-md-6">
                    <label for="comodo-largura" class="form-label">Largura(m)</label>
                    <input type="number" class="form-control" id="comodo-largura" required>
                </div>
                <div class="col-md-6">
                    <label for="comodo-comprimento" class="form-label">Comprimento(m)</label>
                    <input type="number" class="form-control" id="comodo-comprimento" required>
                </div>
            </fildset>
            <fildset class="row g-2">
            <legend>Piso</legend>
                <div class="col-md-6">
                    <label for="piso-largura" class="form-label">Largura(m)</label>
                    <input type="number" class="form-control" id="piso-largura" required>
                </div>
                <div class="col-md-6">
                    <label for="piso-comprimento" class="form-label">Comprimento(m)</label>
                    <input type="number" class="form-control" id="piso-comprimento" required>
                </div>
            </fildset>
            <div class="col-md-12"> 
                <label for="margem" class="form-label">Margem(%)</label>
                <input type="number" class="form-control" id="margem" required>
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary" id="btn-calcular" onclick="processar();">Calcular</button>
            </div>
            <div class="col-md-12">
                <div id="resultado"></div>
            </div>
        </form> 
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function processar(){
        const comodoLargura = document.getElementById("comodo-largura").value;
        const comodoComprimento = document.getElementById("comodo-comprimento").value;
        const pisoLargura = document.getElementById("piso-largura").value;
        const pisoComprimento = document.getElementById("piso-comprimento").value;
        const margem = document.getElementById("margem").value;

        if(comodoLargura <= 0){
            alert("A largura do comôdo deve ser maior que 0");
            return;
        }

        if(comodoComprimento <= 0){
            alert("O comprimento do comôdo deve ser maior que 0");
            return;
        }

        if(pisoLargura <= 0){
            alert("A largura do piso deve ser maior que 0");
            return;
        }

        if(pisoComprimento <= 0){
            alert("O comprimento do piso deve ser maior que 0");
            return;
        }

        if(margem <= 0){
            alert("A margem deve ser maior que 0");
            return;
        }
    }

</script>
</body>
</html>