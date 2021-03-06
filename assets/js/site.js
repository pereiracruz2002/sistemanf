$(document).ready(function(){
    $('#login').on('submit', function(e){
        e.preventDefault()
        var form = $(this)
        $.ajax({
            url: form.attr('action'),
            method: 'post',
            data: form.serialize(),
            dataType: 'json',
            beforeSend: function(){
                form.find('input, button').addClass('disabled')
                form.find('button').text('Verificando cadastro...')
            },
            success: function(data){
                if(data.status == 'erro'){
                    if(data.has_cadastro > 0){
                        alert(data.msg)
                        form.find('button').text('Entrar')
                        form.find('input, button').removeClass('disabled')
                    } else {
                        location.href = base_url+'usuario'
                    }
                }else{
                    location.href = base_url
                }
            }
        })
    })

    $('select[name=id_regional] option').each(function(){
        var elm = $(this)
        elm.text(elm.text().replace(/\/  /gi, ''))
        elm.text(elm.text().replace(/\/ $/g, ''))
        elm.text(elm.text().replace(/^ \//g, ''))
        
    })
})
$('.sidebar').height($('body').height())
