<!DOCTYPE html>
<html>
	<head>
	<style type="text/css">
#main1	{display:inline-block;
		width: 400px;
		height: 300px;
		margin: 0px 0px 0px 0px;
		overflow: hidden;
		border-style: solid;
		}
		
#contents1	{display:block;
			width: 1100px;
			height: 800px;
			top: 60px;
			margin-left: auto;
			margin-right: auto;
			position: relative;}

#left1		{display:inline-block;
			width: 600px;
			height: 500px;
			overflow: hidden;
			border-style: solid;
		}

#table1 {
		border-width:2px;
		border-color:black;
		width: 500px;
		height:400px;
		background-color:silver;
	
	
}

@media screen and (min-width: 769px){

/** * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/) * http://cssreset.com */
html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, 
pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, 
samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset,
 form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, 
 details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, 
 summary,time, mark, audio, video 
		{	margin: 0;	padding: 0;	border: 0;	font-size: 100%;	
		font: inherit;	vertical-align: top; font-family: 'Times New Roman';}
		


/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption , figure, footer, header, hgroup, menu, nav, section {	display: block;}
body {	line-height: 1;}

ol, ul 		{	list-style: none;}

blockquote, q {	quotes: none;}

blockquote:before, blockquote:after,q:before, q:after {	content: '';	content: none;}

table {	border-collapse: collapse;	border-spacing: 0; border-color:black; border:medium;}


	
	.auto-style1 {
		margin-top: 0px;
	}


	
	</style>
	  	</head>
  	
	<body>
	<div header>
		<h3>"Meeting Title"</h3>
	</div>
	
	
	
		<div>
			Timer: 00:00:00</div>
	
	
	
		<!--Header on top of the page where all user account setting navigation should be done-->
				<!--main contents comes inside here-->
		<div id="contents1">
			<!--left side of the contents such as icon and navigation bar-->
			<div id="left1" style="width: 510px">
				<!--icon img-->
				 <table id="table1">
            <tr>
                <td>
                    Agenda 1</td>
            </tr>
            <tr>
                <td>
                    Agenda 2</td>
            </tr>
            <tr>
                <td>
                    Agenda 3</td>
            </tr>
            <tr>
                <td>
                    Agenda 4</td>
            </tr>
            <tr>
                <td>
                    Agenda 5</td>
            </tr>
        </table>
			</div>
			<!--Main contents comes in side here please edit or enter contents in here-->
			<div id="main1" class="auto-style1">
				 Meeting ID:
        <input type="text" /><br />
        Department:
        <input type="text" /><br />
        Supervisor:
        <input type="text" /><br />
        Description:
        <textarea name="S1" cols="20" style="height: 76px"></textarea><br />
        <br />
        Voting 1:<br />
        Voting 2:<br />
        Voting 3:<br />
        <br />
        <input id="Button1" type="button" value="Create New Vote" /><br />
			<!--Main contents ends here-->
		</div>
		
		</div>
	</body>
</html>