
            
            function addRow()
            {
                // get input values
                var discipline = document.getElementById('discipline').value;
                 var year = document.getElementById('year').value;
                 var score = document.getElementById('score').value;
				  var percent = document.getElementById('percent').value;
				   var valid = document.getElementById('valid').value;
                  
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[0];
                  
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(1);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
				  var cel4 = newRow.insertCell(3);
				  var cel5 = newRow.insertCell(4);
                  
                  // add values to the cells
                  cel1.innerHTML = discipline;
                  cel2.innerHTML = year;
                  cel3.innerHTML = score;
				  cel4.innerHTML = percent;
				  cel5.innerHTML = valid;
            }
            
        
