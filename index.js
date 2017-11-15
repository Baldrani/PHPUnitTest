var test = require('tape')

test('timing test', function(t) {
	t.plan(2);

	t.equal(typeof Date.now, 'funtion');
	var start = Date.now();

	setTimeout(function () {
		t.equal(Date.now() - start, 100);
	}, 100);
});


