function add_new_edit_row(row_class) {
    var id = Math.floor(Math.random() * 100000000);

    if (row_class == "priceoption1-done") {
        var html = "<div class='row' row_id='" + id + "'> <div class='col-md-4'> <div class='form-group'> <label for='clause' class='form-label'>البند</label> <input type='text' row_id='" + id + "' name='clause[]' class='form-control' placeholder='الإضاءات والشاشة'/> </div> </div> <div class='col-md-6'> <div class='form-group'> <label for='clause_cost' class='form-label'>القيمة المالية  - رقماً <span class='nexa-light'>(SR)</span></label> <input type='number' name='clause_cost[]' class='form-control priceoption3_total-done' placeholder='15000'> </div> </div> <div class='col-md-2'> <div class='row'> <div class='col-md-6 zayd'> <label class='form-label'> <span class='l3mara'> إضافة </span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'> <span class='l3mara'> حذف</span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div> </div>";
    }
    if (row_class == "priceoption2-done") {
        var html = "<div class='row' row_id='" + id + "'> <div class='col-md-5'> <div class='form-group'> <label for='service_' class='form-label'>الخدمة</label> <input type='text' name='service_[]' class='form-control' placeholder='يكتب هنا الخدمة'> </div> </div> <div class='col-md-5'> <div class='form-group'> <label for='servicedetails' class='form-label'>تفاصيل الخدمة</label> <textarea name='servicedetails[]' id='' class='form-control' cols='30' rows='1' placeholder='يكتب هنا التفاصيل الفنية'></textarea> </div> </div> <div class='col-md-2'> <div class='row'> <div class='col-md-6 zayd'> <label class='form-label'> <span class='l3mara'> إضافة </span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'> <span class='l3mara'> حذف</span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div> </div>";
    }
    if (row_class == "priceoption3-done") {
        var html = "<div class='row' row_id='" + id + "'> <div class='col-md-3'> <div class='form-group'> <label for='service_' class='form-label'>الخدمة</label> <input type='text' name='service_[]' class='form-control' placeholder='يكتب هنا الخدمة'> </div> </div> <div class='col-md-4'> <div class='form-group'> <label for='servicedetails' class='form-label'>تفاصيل الخدمة</label> <textarea name='servicedetails[]' id='' class='form-control' cols='30' rows='1' placeholder='يكتب هنا التفاصيل الفنية'></textarea> </div> </div> <div class='col-md-3'> <div class='form-group'> <label for='service_cost' class='form-label'> التكلفة (ريال سعودي) </label> <input type='number' name='service_cost[]' class='form-control priceoption3_total-done' placeholder='15000'> </div> </div> <div class='col-md-2'> <div class='row'> <div class='col-md-6 zayd'> <label class='form-label'> <span class='l3mara'> إضافة </span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'> <span class='l3mara'> حذف</span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div> </div>";
    }
    if (row_class == "done_project_step") {
        var html = "<div class='row' row_id='" + id + "'> <div class='col-md-10'> <div class='form-group'> <label for='project_step' class='form-label'> الخطوة </label> <input row_id='" + id + "' type='text' name='project_step[]' class='form-control' placeholder='الأولى' required> </div> </div> <div class='col-md-2'> <div class='row'> <div class='col-md-6 zayd'> <label class='form-label'> <span class='l3mara'> إضافة </span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'> <span class='l3mara'> حذف</span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div> </div>";
    }

    if (row_class == "financialselect1") {
        var html = "<div class='row' row_id='" + id + "'> <div class='col-md-2'> <div class='form-group'> <label  class='form-label'> المرحلة </label> <input type='text' class='form-control service_' name='service_[]' placeholder='قبل الإنتاج' > </div> </div> <div class='col-md-3'> <div class='form-group'> <label  class='form-label'>تفاصيل الخدمة</label> <textarea class='form-control servicedetails' name='servicedetails[]' rows='2' placeholder='صناعة فكرة المشروع' ></textarea> </div> </div> <div class='col-md-2'> <div class='form-group'> <label class='form-label'> سعر اليوم <span class='nmr-ftr'>(SR)</span></label> <input row_id='" + id + "' type='number' step='any' class='form-control dayprice' name='dayprice[]' placeholder='50' > </div> </div> <div class='col-md-1-5'> <div class='form-group'> <label class='form-label'> عدد الأيام </label> <input row_id='" + id + "' type='number' step='any' class='form-control numberofdays' name='numberofdays[]' placeholder='2' > </div> </div> <div class='col-md-1-5'> <div class='form-group'> <label class='form-label'>التكلفة <span class='nmr-ftr'>(SR)</span></label> <input row_id='" + id + "' type='number' step='any' class='form-control cost' name='cost[]' placeholder='100' > </div> </div> <div class='col-md-2'> <div class='row'> <div class='col-md-6 zayd'> <label class='form-label'> <span class='l3mara'> إضافة </span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'> <span class='l3mara'> حذف</span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div> </div>";
    }













    if (row_class == "XXXXXX") {
        var html = "<div class='row' row_id='" + id + "'> XXXXXX <div class='col-md-2'> <div class='row'> <div class='col-md-6 zayd'> <label class='form-label'> <span class='l3mara'> إضافة </span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'> <span class='l3mara'> حذف</span> </label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div> </div>";
    }


    $('.' + row_class).append(html);
    $('.' + row_class + ' .zayd').hide();
}

function remove_null(object){
    var count = 0;
    $.each(object, function(key, value){
        if (value === "" || value === null){
            delete object[key];
            count++;            
        }
    });
    var lenght = object['length'];
    object['length'] = lenght-count;
    return object;
}