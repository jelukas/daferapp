<select id="AlbaranesclienteAlbaranescliente" multiple="multiple" name="data[Albaranescliente][Albaranescliente][]">
    <?php foreach($albaranesclientes as $key  => $value): ?>
    <option value="<?php echo $key?>"><?php echo $value?></option>
    <?php endforeach; ?>
</select>