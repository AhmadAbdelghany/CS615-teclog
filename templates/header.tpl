<html>
<head>
    <title>{$title} - {$Name}</title>
    <link rel="stylesheet" lang="text/css" href="styles.css"/>
	
	<!-- including the reference to NicEdit -->
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	
	<!-- initializing the RTF editor -->
	<script type="text/javascript">
		bkLib.onDomLoaded(
			function() { 
				// create a new RTF editor replacing the textarea field with id=content
				new nicEditor().panelInstance('content');
			}
		);
	</script>
</head>
<body>
