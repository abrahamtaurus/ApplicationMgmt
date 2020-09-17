
            
            function addRow() {
    // get input values
    var university = document.getElementById('university').value;
    var degree_yr = document.getElementById('degree_yr').value;
    var subject = document.getElementById('subject').value;
    var class = document.getElementById('class').value;
    var percentage = document.getElementById('percentage').value;
​
    // get the html table
    // 0 = the first table
    var table = document.getElementsByTagName('table')[0];
​
    // add new empty row to the table
    // 0 = in the top 
    // table.rows.length = the end
    // table.rows.length/2+1 = the center
    var newRow = table.insertRow(1);
​
    // add cells to the row
    var cel1 = newRow.insertCell(0);
    var cel2 = newRow.insertCell(1);
    var cel3 = newRow.insertCell(2);
    var cel4 = newRow.insertCell(3);
    var cel5 = newRow.insertCell(4);
​
    // add values to the cells
    cel1.innerHTML = university;
    cel2.innerHTML = degree_yr;
    cel3.innerHTML = subject;
    cel4.innerHTML = class;
    cel5.innerHTML = percentage;
}
​
​
function getFormDataQualification() {
    var jsnQualificationList = new Array();
    var vjsnQual;
    var currentRow;
    var rowCtr=0;
    
    $("#tbl-qualification tr").each(function () {
        if(rowCtr++ == 0) return; 
        vjsnQual = new Object();
        currentRow = $(this);
                
        vjsnQual.university = currentRow.find("td:eq(1) input").val();
        vjsnQual.degree_yr = currentRow.find("td:eq(2) input").val();
        vjsnQual.subject = currentRow.find("td:eq(3) input").val();
        vjsnQual.class1 = currentRow.find("td:eq(4) input").val();
        vjsnQual.percentage = currentRow.find("td:eq(5) input").val();
                
        jsnQualificationList.push(vjsnQual);
    });
    
    return jsnQualificationList;
}
​
function getDataFromServerQualification() {
    
    $.ajax({
           type: "get",
           url: "/qualification/QualificationCtl.php/getAll",
           dataType: "json",
           data: getFormDataQualification(),
           success: function (response) {
               if (response) {
                   populateForm(response);
               } else {
                   alert("Server Error");
               }
           },
​
       });    
}
​
function submitDataToServerQualification() {
    console.log(getFormDataQualification());
    
    $.ajax({
           type: "post",
           url: "/root/Education/EducationQualCtl.php",
           dataType: "json",
           contentType: 'application/json',
           data: getFormDataQualification(),
           success: function (response) {
               if (response) {
                   alert("New Id = " + response.id);
               } else {
                   alert("Server Error");
               }
           },
​
       });
}
​
function validateFormData() {
​
}
​
function populateForm(jsnQualificationList) {
    var vjsnQual;
    var currentRow;
    var rowCtr=0;
    
    
    $("#tbl-qualification tr").each(function () {
        if(rowCtr++ == 0) return; 
        
        currentRow = $(this);
​
        vjsnQual = jsnQualificationList[rowCtr-2];;
                
         currentRow.find("td:eq(1) input").val(vjsnQual.university);
         currentRow.find("td:eq(2) input").val(vjsnQual.degree_yr);
         currentRow.find("td:eq(3) input").val(vjsnQual.subject);
         currentRow.find("td:eq(4) input").val(vjsnQual.class);
         currentRow.find("td:eq(5) input").val(vjsnQual.percentage);        
    });
    
    return jsnQualificationList;
}
​
populateForm();
            
        
