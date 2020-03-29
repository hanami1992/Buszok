<form action="index.php?p=modifyBus" method="POST">
    <fieldset class="modify-bus-form">
        <legend>Buszjárat módosítása</legend>

        <label for="">Indulás</label>
        <input type="text" name="indulas" value="<?= $indulas?>" required>

        <label for="">Cél</label>
        <input type="text" name="cel" value="<?= $cel?>" required>

        <label for="">Menetidő</label>
        <input type="text" name="menetido" min="0" value="<?= $menetido?>" required>

        <label for="">Alacsony</label>
        <input type="text" name="low" max="1" min="0" value="<?= $alacsony?>" required>

        <input type="submit" value="Submit" class="btn btn-grn">
        <input type="hidden" value="id" value="<?= $id?>">
    </fieldset>
</form>