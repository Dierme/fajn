<?php
/**
 * Created by PhpStorm.
 * User: kalim_000
 * Date: 3/6/2017
 * Time: 9:23 AM
 */

?>
<form action="align" method="post">
    <div class="row pad-btm">
        <div class="col-md-6">
            <label class="text-2x" for="seq1">Sequence</label><br>
            <textarea id="seq1" name="seq1" style="width: 80%" rows="5"><?=$seq1?></textarea>
        </div>
        <div class="col-md-6">
            <label for="seq2" class="text-2x">Needle</label><br>
            <textarea id="seq2" name="seq2" style="width: 80%" rows="5"><?=$seq2?></textarea>
        </div>
    </div>
    <div class="row pad-btm">
        <div class="col-md-1">
            <button type="submit" class="btn btn-lg btn-success">Find</button>
        </div>
        <div class="col-md-1">
            <a class="btn btn-lg btn-primary">Blast</a>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12">
        <div>
            <span class="text-3x">Result:</span>
            <span class="text-2x"?><?=$result['message']?></span>
        </div>
        <div>
            <span class="text-3x">Position:</span>
            <span class="text-2x"?><?=$result['position']?></span>
        </div>

    </div>
</div>
