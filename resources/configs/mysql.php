<?php

	class Simple {

		public $text = "Hello!";

		public void printText() {
			echo $this->text;
		}
	}

	$s = new Simple();
	$s->printText();
?>

