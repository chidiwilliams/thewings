@extends('layouts.app')

@section('content')
    <section class="done attend">
        <div class="small page-header">Here's your invitation...</div>
        <div id="capture">
            <div id="invitation" class="invitation" style="background-image: url('{{ asset('img/bg.png') }}'); background-size: cover; color: #fff;">
                <div class="invitation-header">The Wings Award 2018</div>
                <div class="invitation-dets">
                    <div class="dets-group">
                        <div class="label">Full name</div>
                        <div class="det name">Chidi Williams</div>
                    </div>
                    <div class="dets-group">
                        <div class="label">Type</div>
                        <div class="det class">Graduate</div>
                    </div>
                    <div class="dets-group">
                        <div class="label">ID</div>
                        <div class="det id">ew3lb3wqfwq09</div>
                    </div>
                </div>
                <div class="iv-footer">
                    <img src="{{ asset('img/wings-white-no-text.png') }}"  class="wings">
                    <div class="soar">We soar as eagles...</div>
                </div>
            </div>
        </div>
        <div id="iv"></div>
        <div id="imgg"></div>
        <div class="small page-footer">...we've also sent it to your mailbox.</div>
    </section>
@endsection

@section('js')
<script>
    $(function() {
        html2canvas(document.querySelector("#invitation"))
            .then(canvas => {
                $("#iv").append(canvas)
                $("#capture").hide()
                var img = new Image();
                img.src = canvas.toDataURL("image/png");
                img.style.width = '100%';
                img.style.maxWidth = '600px';
                $('#imgg').append(img);
                $('#iv').hide();
            });
    })
</script>
@endsection
