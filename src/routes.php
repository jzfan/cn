<?php

Route::get('cn', function () {
	 echo \Carbon\Carbon::today()->diffForHumans();
});