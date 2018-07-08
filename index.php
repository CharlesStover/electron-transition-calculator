<?php

if (
	array_key_exists('from', $_GET)      && array_key_exists('to', $_GET) &&
	preg_match('/^\d+$/', $_GET['from']) && preg_match('/^\d+$/', $_GET['to']) &&
	$_GET['from'] >= 1                   && $_GET['to'] >= 1 &&
	$_GET['from'] <= 7                   && $_GET['to'] <= 7
) {
	$from = $_GET['from'];
	$to   = $_GET['to'];
}
else {
	$from = 2;
	$to   = 1;
}

$delta_e    = -2.178e-18 * (1 / pow($to, 2) - 1 / pow($from, 2));
$wavelength = abs(1.9864458e-25 / $delta_e);
$nu         = abs($delta_e / 6.62607004e-34);

?>
<DOCTYPE html>
<html>
	<head>
		<title>Electron Transitions</title>
		<meta name="description" content="Calculcator for the energy, frequencies, wavelengths of electron transitions." />
		<meta name="keywords" content="electron transition calculator, n=<?php echo $from; ?> to n=<?php echo $to; ?>" />
	</head>
	<body>
		<section>
			<h2>Electron Transition Calculator</h2>
			<form action="/electron-transitions" method="get">
				<p>From <strong>n = <input name="from" type="number" value="<?php echo $from; ?>" /></strong> to <strong>n = <input name="to" type="number" value="<?php echo $to; ?>" /></strong></p>
				<input type="submit" value="Calculate!" />
			</form>
		</section>
		<section>
			<h2>Solutions &amp; Equations</h2>
			<table>
				<tbody>
					<tr>
						<th>Change in Energy (&Delta;E)</th>
						<td id="delta-e"><?php echo $delta_e; ?> <abbr title="Joules">J</abbr></td>
						<td>-2.178&times;10<sup>-18</sup> &times; (1&divide;<strong><?php echo $to; ?></strong><sup>2</sup> &minus; 1&divide;<strong><?php echo $from; ?></strong><sup>2</sup>)</td>
					</tr>
					<tr>
						<th>Frequency (&nu;)</th>
						<td><?php echo $nu; ?> <abbr title="Hertz">Hz</abbr></td>
						<td><strong><abbr title="Change in Energy"><?php echo $delta_e; ?></abbr></strong> &divide; <abbr title="Planck's Constant">6.626&times;10<sup>-34</sup></abbr></td>
					</tr>
					<tr>
						<th>Wavelength (&lambda;)</th>
						<td><?php echo $wavelength; ?> <abbr title="meters">m</abbr></td>
						<td><abbr title="Planck's Constant">6.626&times;10<sup>-34</sup></abbr> &times; <abbr title="Speed of Light">3&times;10<sup>8</sup></abbr> &divide; <strong><abbr title="Change in Energy"><?php echo $delta_e; ?></abbr></strong></td>
					</tr>
				</tbody>
			</table>
		</section>
		<section>
			<h2>Constants</h2>
			<table>
				<tbody>
					<tr>
						<th>Planck's Constant</th>
						<td>6.626 &times; 10<sup>-34</sup></td>
					</tr>
					<tr>
						<th>Speed of Light</th>
						<td>3 &times; 10<sup>8</sup></td>
					</tr>
				</tbody>
			</table>
		</section>
	</body>
</html>
