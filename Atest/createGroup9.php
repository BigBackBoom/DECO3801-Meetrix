<!DOCTYPE html>
<html>

<head>
<link href="chosen.css" media="all" rel="stylesheet" type="text/css" />
<link href="chosen.min.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

<h3>Create Groups</h3>
<br />
Group Name: <input size="30" type="text" /> <br />
Group Members: <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                        									<option value="Sales">Sales</option>
                        									<option value="IT">IT </option>
															<option value="Management">Management</option>
															<option value="General">General</option>

                        							 </select>
<br />
<br />
<br />
<br />
<input name="create" type="submit" value="Create" />
<input type="reset" value="Reset" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
</body>

</html>
