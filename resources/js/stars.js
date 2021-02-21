 

 

 


$('.click-star').on('click',function()
{

	n =$(this).data('star');

	$(`.click-star `).removeClass('fas')
	$(`.click-star `).addClass('fal')


	$('input[type=hidden][name=stars]').val(n);
	for(i=1; i<=n; i++)
	{
		$(`.click-star[data-star=${i}]`).removeClass('fal')
		$(`.click-star[data-star=${i}]`).addClass('fas')
	}

})







