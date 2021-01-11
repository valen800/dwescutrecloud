<form method="post" action="controller.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputFile">Elige el archivo a subir</label>
        <input type="file" class="form-control-file" name="inputFile" id="inputFile" placeholder="Selecciona archivo" aria-describedby="fileHelpId">
        <small id="fileHelpId" class="form-text text-muted">Irás rellenando tu CutreCloud</small>
    </div>
    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
</form>