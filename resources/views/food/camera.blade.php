@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<body>
<section id="container" class="container">
 <div class="controls">
   <fieldset class="input-group">
     <input type="file" accept="image/*;capture=camera">
        <button id="btnIdents">認識</button>
   </fieldset>
 </div>
 <div id="interactive" class="viewport"><br clear="all"></div>
</section>
<script src="https://cdn.bootcss.com/jquery/2.0.3/jquery.js" type="text/javascript"></script>
<script src="{{ URL::asset('/') }}js/quagga.js" type="text/javascript"></script>
<script type="text/javascript">
    
$(function() {var App = {
        init: function() {
            App.attachListeners();
        },
        attachListeners: function() {
            var self = this;
            $("#btnIdents").on("click", function(e) {
                var input = document.querySelector(".controls input[type=file]");
                if (input.files && input.files.length) {
                    App.decode(URL.createObjectURL(input.files[0]));
                }
            });
        },
        decode: function(src) {
            var self = this,
                config = $.extend({}, self.state, {src: src});
            Quagga.decodeSingle(config, function(result) {
                //识别结果
                if(result.codeResult){
                    console.log(result.codeResult.code);
                    alert("バーコードは:" + result.codeResult.code);
                    var res = result.codeResult.code
                    var myUrl = "/refrigerators/camera"
                    //window.open("https://www.janken.jp/goods/jk_catalog_syosai.php?jan=" + result.codeResult.code);
                }else{
                    alert("バーコードを認識できません");
                }
            });
        },
        state: {
            inputStream: {
                size: 400,
                singleChannel: false
            },
            locator: {
                patchSize: "medium",
                halfSample: true
            },
            decoder: {
                readers: [{
                    format: "ean_reader",
                    config: {}
                }]
            },
            locate: true,
            src: null
        }
    };

    App.init();
});

</script> 

<div class="card-body">
    <form action="/refrigerators/{{ $refrigerator->id}}/foods/camera" method="post">
        @csrf
        <div class="form-group mt-2">
            <label for="barcode">バーコード</label>
            <input name="barcode" type="barcode" class="form-control" id="exampleInputbarcode" aria-describedby="barcodeHelp" placeholder="Barcode">
            
        </div>
        <div class="form-group mt-2">
            <label for="shelf_life">賞味期限</label>
            <input name="shelf_life" type="date" class="form-control" id="exampleshelf_life" aria-describedby="shelf_lifeHelp" >
  
        </div>
        <button type="submit" class="btn btn-primary">Add food</button>
    </form>
</div>

</body>
</html>
@endsection
