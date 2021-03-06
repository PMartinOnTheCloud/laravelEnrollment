<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>Sample Page</title>
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
	    <script src="https://kit.fontawesome.com/74ec47558a.js" crossorigin="anonymous"></script>

    </head>
    <body class="text-center">
		<h1>Sample page</h1>
		<p>This is a test page filled with common HTML elements. </p>
		<div class="container">
		<ul class="list-group">
			<li class="list-group-item"><a class="btn btn-lin" href="http://www.iesesteveterradas.cat/">This is a text link</a>.</li>
			<li class="list-group-item"><strong>Strong is used to indicate strong importance.</strong></li>
			<li class="list-group-item"><em>This text has added emphasis.</em></li>
			<li class="list-group-item">The <b>b element</b> is stylistically different text from normal text, without any special importance.</li>
			<li class="list-group-item">The <i>i element</i> is text that is offset from the normal text.</li>
			<li class="list-group-item">The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation.</li>
			<li class="list-group-item"><del>This text is deleted</del> and <ins>This text is inserted</ins>.</li>
		</ul>
	</div>
		<p>This is a second list:</p>
		<ol>
			<li><s>This text has a strikethrough</s>.</li>
			<li><small>This small text is small for for fine print, etc.</small></li>
			<li>Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></li>
			<li><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation.</q></li>
			<li><cite>This is a citation.</cite></li>
			<li>The <dfn>dfn element</dfn> indicates a definition.</li>
			<li>The <mark>mark element</mark> indicates a highlight.</li>
			<li>The <var>variable element</var>, such as <var>x</var> = <var>y</var>.</li>
			<li>The time element: <time datetime="2013-04-06T12:32+00:00">2 weeks ago</time></li>
		</ol>
		<h2>Sample Form</h2>
		<p>All form fields are required.</p>
		<form class="form-control">
			<fieldset>
			<legend>Your title here</legend>
				<p><label>Email</label>
				<input type="text" class="form-control " placeholder="email@dominio.es"></p>

				<p><label>Password</label>
				<input class="form-control " type="password" ></p>

				<p><label>Make your choice:</label>
				<select class="form-control">
					<option>London</option>
					<option>Paris</option>
					<option>Barcelona </option>
					<option>Roma</option>
				</select></p>

				<input type="submit" class="" value="Submit">
				<button class="">I'm a button</button>
				<a class="btn btn-link" href="#">I'm a link that appear like a button</a>
			</fieldset>
		</form>
		<div class="container">
		<h3>Super Important data</h3>
		<table class="table table-striped" border="1" cellpadding="10">
			<caption>The dark side teachers</caption>
			<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Birthday</th>
				<th>Password</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Leandro Zabala</td>
				<td>lzabala@xtec.cat</td>
				<td>2021/02/24</td>
				<td>iLoveAjax</td>
			</tr>
			<tr>
				<td>Enric Mieza</td>
				<td>emieza@xtec.cat</td>
				<td>2021/02/24</td>
				<td>ILovePHP</td>
			</tr>
			<tr>
				<td>Xavi Gómez</td>
				<td>xgomez@xtec.cat</td>
				<td>2021/02/24</td>
				<td>ILoveCSS</td>
			</tr>
			</tbody>
		</table>
	</div>
		<p>Break up your page with a horizontal rule or two. </p>
		<hr>
        <footer style="height: 80px">
		<p>&#169; M9 Disseny d'interficies web 2021<br><small>IES Esteve Terradas i Illa</small></p>
        </footer>
    </body>
</html>
