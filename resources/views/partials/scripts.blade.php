@push('js')
    <script>
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
        // activate select2
    $('.js-example-basic-single').select2();
////////////////////////////////////////////////////////////////////////
    // products data tables
   var table = $('#products_table').DataTable({
         processing: true,
         serverSide: true,
         searching: true,
        dom: 't',
         ajax: {
          url: '/',
          data: function (d) {
                d.search = $('#search').val(),
                d.category = $('#filterCategory').val(),
                d.subCategory = $('#filterSubCategory').val(),
                d.tags = $('#filterTags').val()
            }
         },
         columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'image', name: 'image'},
                  { data: 'desc', name: 'desc' },
                  { name: 'category',data:'category' },
                  { name: 'subCategory',data:'subCategory' },
                  { name: 'tags',data:'tags' },
               ],
        order: [[0, 'desc']]
      });
/////////////////////////////////////////////////////////////////////////
// filter, refresh table on change
    $('#filterCategory').on('change',function(e){
        table.draw();
        let name = e.target.value
        var selected = $(this).find('option:selected');
        var id = selected.data('cat'); 
        
    $.ajax({
        url: `get_sub_categories/${id}`,
        type: 'get',
        // data: {_token: CSRF_TOKEN,id},
        success: function(response){
            var html = "<option value='all'>All</option>"
            response.forEach(el => {
                html += `<option value=${el.name}>${el.name}</option>`
            });
            $('#filterSubCategory').html(html)
        }
    })
    });
    $('#filterSubCategory').on('change',function(){
        table.draw();
    });
    $('#search').on('keyup',function(e){
        console.log(e.target.value)
        table.draw();
    });
    $('#filterTags').on('change',function(){
        table.draw();
    });
    ////////////////////////////////////////////////////////////////////
    // fire on select category to get sub categories
    $('#category').on('change' , function(e){
    let id = e.target.value
    $.ajax({
        url: `get_sub_categories/${id}`,
        type: 'get',
        success: function(response){
            var html = ''
            response.forEach(el => {
                html += `<option value=${el.id}>${el.name}</option>`
            });
            $('#subCategory').html(html)
        }
    })
    })
    //////////////////////////////////////////////////////////////////
    // calculate total cost
    $('#stock').on('change' , function(e){
let purchase_price = $('#purchase_price').val()
let stock = $('#stock').val()
let total = purchase_price * stock
$('#total').html(total)
    });
         });
    </script>
@endpush