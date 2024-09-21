<div class="position-relative">
<div class="d-flex justify-content-between align-items-center">
	<b>Result</b>
	<button class="btn btn-primary mb-2 result-add btn-sm sm">Upload Student Result</button>
</div>
<div class="container">
	<form class="card shadow p-3">
		<label> Search For Student Result With Reg Number</label>
		<div class="d-flex">
		<input type="search" class="form-control boder search_algorithm" placeholder="Enter student registration number/Class/Term">
		<button type="button" class="btn btn-primary boder" name="search-result-button">
			Search
		</button>
		</div>
	</form>
	       <div class="table-responsive p-3 Printer_1">
		<table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Subject Name</td>
            <td class='sm' scope='row'>Test</td>
            <td class='sm' scope='row'>Exam</td>
            <td class='sm' scope='row'>Term</td> 
            <td class='sm' scope='row'>Action</td> 
        </thead>
        <tbody id='form_upload_subject_result-1'>

        </tbody>
    </table>
    </div>
</div>
<div class="result-info">
	<div class="result-info-body bg-light p-3">
		<div class="d-flex align-items-center justify-content-between mb-2"><span class="text-dark"> Upload Result </span> 
		<button class="btn btn-danger sm info-result-button">Close</button></div>
		<input type="search" name="student-adm" placeholder="Enter Student Admission number" class="boder form-control form-control-sm">
		<div class="table-responsive Display-upload-result">
		<table class="table">
		<thead class='sm'>
            <td class='sm' scope='row'>Uploaded Subject Name</td>
            <td class='sm' scope='row'>Uploaded Test Score</td>
            <td class='sm' scope='row'>Uploaded Exam Score</td>
            <td class='sm' scope='row'>Uploaded Term Selected</td> 
        </thead>
		<tbody class="Exam_uploaded_div">
        </tbody>
        </table>
        </div>
        <div class="table-responsive">
		<table class="table table-sm table-striped table-hover mt-4">
        <thead class='sm'>
            <td class='sm' scope='row'>Subject Name</td>
            <td class='sm' scope='row'>Test</td>
            <td class='sm' scope='row'>Exam</td>
            <td class='sm' scope='row'>Term</td> 
        </thead>
        <tbody>
 
    	<form id='form_upload_subject_result'>
            <tr class="">
                <th class='sm'>
                	<input type="text" name="" class="form-control form-control-sm term-get-subject">
                </th>
                <td class='sm'>
                	<input type="number" placeholder="Enter test score" name="" class="form-control form-control-sm term-get-test-score">
                </td>
                <td class='sm'>
                	<input type="number" placeholder="Enter exam score" name="" class="form-control form-control-sm term-get-exam-score">
                </td>
                <td class='sm'>
                	<select class="term-get-id-result">
                		<option value="1">First</option>
                		<option value="2">Second</option>
                		<option value="3">Third</option>
                	</select>
                </td>
            </tr>
    	</form>
        </tbody>
    </table>
    </div>
    <input type="button" upload='result' value='Upload Result' class='students_id_result btn btn-success small btn-sm' name="">
    <form class="mt-4">
    <label class="d-block">Upload CSV</label>
    <input type="file" ><button class="btn btn-sm btn-primary sm">Upload CSV</button>
    </form>
	</div>
</div>
</div>
<script type="text/javascript">
	$('.info-result-button').click(function()
	{
		$('.result-info').slideUp(100);
	})
	$('.result-add').click(function()
	{
		$('.result-info').slideDown(100);
	})
</script>