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
                        <div class="det name">{{ ucwords($iv->first_name) }} {{ ucwords($iv->last_name) }}</div>
                    </div>
                    <div class="dets-group">
                        <div class="label">Type</div>
                        <div class="det class">{{ ucwords($iv->type) }}</div>
                    </div>
                    <div class="dets-group">
                        <div class="label">ID</div>
                        <div class="det id">{{ $iv->ivid }}</div>
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
        <div class="small page-footer">...you might want to save the image (but we'll also send it to your mailbox).</div>
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
