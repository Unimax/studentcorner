Git.Repository.open(repoFullPath).then(function(repo) {
		throw new Error('bad happened'); // assume error happens
        return 111;
    }).then(function(lukkyNumber) {// will not be called if error occured before
        console.log(lukkyNumber); 
        return 'Step 2';
    }).then(function(stepString) { // will not be called if error occured before
        console.log(stepString); 
        // we work was suppose to be DONE here
    }).catch(function(err) { // executes asap any error occure in the above chain
        console.log(err.message); 
		return err; // total optional line if u want to pass the error object futher
    }).done(function(err) { // not really needed but useful in case of cleanup like hiding popups etc.
		// normally err argument wont be there so it would be }).done(function() {
		console.log('I am always executed! error or success');
		if(err != undefined)  	console.log(err.message);
    });
    
//===========below is complete working code

var defer = $.Deferred();
defer.then(function(repo) {
		throw new Error('bad happened'); // assume error happens
        return 111;
    }).then(function(lukkyNumber) {// will not be called if error occured before
        console.log(lukkyNumber); 
        return 'Step 2';
    }).then(function(stepString) { // will not be called if error occured before
        console.log(stepString); 
        // we work was suppose to be DONE here
    }).catch(function(err) { // executes asap any error occure in the above chain
        console.log(err.message); 
		return err; // total optional line if u want to pass the error object futher
    }).done(function(err) { // not really needed but useful in case of cleanup like hiding popups etc.
		// normally err argument wont be there so it would be }).done(function() {
		console.log('I am always executed! error or success');
		if(err != undefined)  	console.log(err.message);
    });
 defer.resolve( 5 );
