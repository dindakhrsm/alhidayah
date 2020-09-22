{{-- @extends('layouts.app') --}}
@extends('layouts.backend.main')
@section('title', 'Al-Hidayah | Rekap Laporan')
@section('content')
    <div class="content-wrapper">
        <div class="row  justify-content-center">
            <section class="content">
                <div class="col-md-12">
                    @include('backend.cetaklaporan._content')
                </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('js/jspdf.min.js') }}"></script>
<script src="{{ asset('js/jspdf.plugin.autotable.js') }}"></script>
<script>
//jspdf
function printPDF(){
    var dari=$("input[name=dari]")
    var sampai=$("input[name=sampai]")
	var date='Dari '+dari.val()+' - '+sampai.val()
	var doc = new jsPDF()
	if(dari.val()==''||sampai.val()==''){
		date='Data Terbaru'
	}
	// It can parse html:
	doc.text('Laporan Keuangan', 100, 20,{
		align:'center',
	}) 
	doc.setTextColor('#696969')
	doc.setFontSize(12)
	doc.text(date, 100, 27,{
		align:'center',
	})
	doc.autoTable({
		html: '#section-to-print',
		theme: 'striped',
		alternateRowStyles:{
			//overflow: 'linebreak',
			//cellWidth: 'wrap',
			minCellWidth: 10
		},
		columnStyles: {
			// 2: {
			// 	cellWidth: 20,
			// },
			// 3: {
			// 	cellWidth: 20,
			// },
			0:{
				halign: 'right',
			},
			1: {
				cellWidth: 20,
				halign: 'center',
			},
			4: {
				cellWidth: 40,
				halign: 'center',
			}
		},
		//columnStyles: {0: {halign: 'center', fillColor: [200, 200, 200]}}, // Cells in first column centered and green
		//rowStyles: {0: {valign: 'middle', fillColor: [200, 200, 200]}}, // Cells in first column centered and green
		margin: {top: 40},
	})
	
    doc.save('alhidayah.lap.'+Date.now()+'.pdf');
}

    // function deltaMonth($date,$val){
    //     var date = new Date($date)
    //     var result
    //     $val++
    //     // date.setDate( date.getDate() - 6 )
    //     date.setMonth(date.getMonth()+$val)
    //     // date.setFullYear( date.getFullYear())
    //     result=(date.getFullYear())+'-'+("0" + date.getMonth()).slice(-2)+'-'+("0" + date.getDate()).slice(-2)
    //     console.log(result)
    //     return result
    // }
    // var dari=$("input[name=dari]")
    // var sampai=$("input[name=sampai]")
    // $("#new").on( "click", function(){
    //     dari.val(deltaMonth(dari.val(),+1))
    //     sampai.val(deltaMonth(sampai.val(),+1))
    // })
    // $("#old").on( "click", function(){
    //     dari.val(deltaMonth(dari.val(),-1))
    //     sampai.val(deltaMonth(sampai.val(),-1))
    // })
</script>
@endsection