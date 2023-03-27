<style>
    .form {
        background: #034D91;
        padding: 70px 0 80px;
    }

    .form .container {
        display: flex;
    }

    .form__wrapper {
        margin-right: 40px;
    }

    .form__title {
        font-weight: 600;
        font-size: 32px;
        line-height: 43px;
        color: #FFFFFF;
        margin-bottom: 30px;
    }

    .form__input-wrap {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
        position: relative;
    }

    .form__input-item input,
    .form__input-item select,
    .form__input-item textarea {
        width: 100%;
        border: 1px solid #93C0F0;
        border-radius: 5px;
        background: #034D91;
        padding: 11px 15px;
        height: 44px;
        color: #fff;
        transition: box-shadow .4s ease;
    }

    .form__input-item input:focus-visible,
    .form__input-item textarea:focus-visible {
        outline: none;
    }

    .form__input-item select option.disabled {
        display: none;
    }

    .form__input-item._error input {
        box-shadow: 0 0px 8px 0px red;
        transition: box-shadow .4s ease;
    }

    .form__input-item._textarea {
        grid-column: span 2;
        height: 112px;
    }

    .form__input-item._btn {
        position: relative;
    }

    .form__input-item._btn input {
        background: transparent;
        border: none;
        cursor: pointer;
        font-weight: 700;
        font-size: 18px;
        line-height: 18px;
        z-index: 2;
        position: relative;
    }

    .form__input-item._btn::before {
        content: "";
        display: block;
        opacity: 1;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 5px;
        background: linear-gradient(270deg, #007AFC 0%, #0057B7 100%);
        transition: opacity .4s ease;
        z-index: 0;
    }

    .form__input-item._btn:hover::before {
        opacity: .5;
    }

    .form__input-item._textarea textarea {
        width: 100%;
        height: 112px;
    }

    .form__input-item input::placeholder,
    .form__input-item textarea::placeholder {
        color: #7193B8;
        font-weight: 400;
        font-size: 17px;
        line-height: 23px;
        max-width: 375px;
        opacity: 1;
        transition: opacity .4s ease;
    }

    .form__input-item input:focus::placeholder,
    .form__input-item textarea:focus::placeholder {
        opacity: 0;
        transition: opacity .4s ease;
    }

    .schedule {
        padding: 30px 40px 40px;
        border: 1px solid #93C0F0;
        border-radius: 1px;
        align-self: flex-start;
        white-space: nowrap;
    }

    .schedule__title {
        font-weight: 600;
        font-size: 24px;
        line-height: 32px;
        color: #FFFFFF;
        margin-bottom: 14px;
    }

    .schedule__items {
        font-weight: 400;
        font-size: 17px;
        line-height: 23px;
        color: #FFFFFF;
    }

    .schedule__item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .schedule__item:last-child {
        margin-bottom: 0;
    }

    .schedule__day {
        margin-right: 54px;
    }

    ._thank {
        position: absolute;
        bottom: 0;
        font-size: 24px;
        color: green;
        font-weight: 600;
        opacity: 1;
        transition: opacity .4s ease;
    }
    ._thank.disable {
        opacity: 0;
        transition: opacity .4s ease;
    }

    @media (max-width: 991px) {
        .form__input-wrap {
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 28px;
            width: 342px;
        }

        .form__input-item._textarea {
            grid-column: span 1;
            height: 112px;
        }

        .form__btn-wrap {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .form {
            padding-top: 50px;
            padding-bottom: 60px;
        }

        .form .container {
            display: block;
        }

        .form__wrapper {
            margin-right: 0;
            margin-bottom: 50px;
        }

        .form__title {
            margin-bottom: 22px;
        }

        .form__input-wrap {
            width: 100%;
            grid-gap: 20px
        }

        .form__input-item._textarea {
            grid-column: span 1;
            height: 112px;
        }

        .form__btn-wrap {
            display: none;
        }
    }
</style>
<div class="form">
    <div class="container">
        <div class="form__wrapper">
            <div class="form__title">Остались вопросы?</div>
            <form class="form__form" method="post" action="<?=$APPLICATION->GetCurUri();?>">
                <div class="form__input-wrap">
                    <div class="form__input-item _name">
                        <input type="text" name="name" placeholder="Ваше имя">
                    </div>
                    <div class="form__input-item _email">
                        <input type="text" name="email" placeholder="Ваш email">
                    </div>
                    <div class="form__input-item _phone">
                        <input type="tel" name="phone" placeholder="+7 999 99-99-99">
                    </div>
                    <div class="form__input-item">
                        <select name="services">
                            <option class="disabled" disabled selected>Вид услуги</option>
                            <option value="Автоэлектрика">Автоэлектрика</option>
                            <option value="Диагностика">Диагностика</option>
                            <option value="Замена жидкостей">Замена жидкостей</option>
                            <option value="Заправка кондиционеров">Заправка кондиционеров</option>
                            <option value="Капитальный ремонт двигателей">Капитальный ремонт двигателей</option>
                            <option value="Компьютерная диагностика двигателя">Компьютерная диагностика двигателя</option>
                            <option value="Мойка">Мойка</option>
                            <option value="Правка дисков">Правка дисков</option>
                            <option value="Промывка инжекторов (форсунок)">Промывка инжекторов (форсунок)</option>
                            <option value="Регулировка фар">Регулировка фар</option>
                            <option value="Ремонт и обслуживание">Ремонт и обслуживание</option>
                            <option value="Ремонт подвески">Ремонт подвески</option>
                            <option value="Сварка">Сварка</option>
                            <option value="Сезонное хранение шин">Сезонное хранение шин</option>
                            <option value="Сход-развал">Сход-развал</option>
                            <option value="Установка автосигнализации">Установка автосигнализации</option>
                            <option value="Установка датчиков парковки">Установка датчиков парковки</option>
                            <option value="Установка ксенона">Установка ксенона</option>
                            <option value="Шиномонтаж">Шиномонтаж</option>
                            <option value="Другое">Другое</option>
                        </select>
                    </div>
                    <div class="form__input-item _textarea">
                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Укажите вашу марку авто, причину обращения и желаемую дату записи"></textarea>
                    </div>
                    <div class="form__btn-wrap">
                        <input name="pass" type="hidden">
                    </div>
                    <div class="form__input-item _btn">
                        <input type="submit" value="Отправить">
                    </div>
                    <div class="_thank disable">Запрос успешно отправлен!</div>
                </div>
            </form>
        </div>
        <div class="schedule">
            <div class="schedule__title">Часы работы</div>
            <div class="schedule__items">
                <div class="schedule__item">
                    <div class="schedule__day">Понедельник</div>
                    <div class="schedule__time">9.00 - 19.00</div>
                </div>
                <div class="schedule__item">
                    <div class="schedule__day">Вторник</div>
                    <div class="schedule__time">9.00 - 19.00</div>
                </div>
                <div class="schedule__item">
                    <div class="schedule__day">Среда</div>
                    <div class="schedule__time">9.00 - 19.00</div>
                </div>
                <div class="schedule__item">
                    <div class="schedule__day">Четверг</div>
                    <div class="schedule__time">9.00 - 19.00</div>
                </div>
                <div class="schedule__item">
                    <div class="schedule__day">Пятница</div>
                    <div class="schedule__time">9.00 - 19.00</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.form__input-item._phone input[type="tel"]').mask('+7 999 99-99-99');
        if ($('.form')) {
            if ($('.form__input-item select option[selected]').text() == 'Вид услуги') {
                $('.form__input-item select').css('color', '#7193B8');
            } else {
                $('.form__input-item select').css('color', '');
            }
        }
        ($('.form__input-item select option')).click(function() {
            if ($(this).text() == 'Вид услуги') {
                $('.form__input-item select').css('color', '#7193B8');
            } else {
                $('.form__input-item select').css('color', '');
            }
        });

        function validateEmail(email) {
            let re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
            return re.test(String(email).toLowerCase());
        }
        $(".form__input-item input").click(function() {
            $(this).parent().removeClass('_error');
        });
        $('form.form__form').submit(function(e) {
            e.preventDefault();
            let email = $(".form__input-item._email input").val();
            if (email != '') {
                if (!validateEmail(email)) {
                    $(".form__input-item._email").addClass('_error');  
                } 
            }

            let secc_n, secc_p

            let name = $(".form__input-item._name input").val();
            var re_name=/^[а-яА-ЯёЁa-zA-Z0-9 \-]{1,35}$/i;

            let phone = $(".form__input-item._phone input").val();

            if(!re_name.test(name)){
				secc_n = false;
				$(".form__input-item._name").addClass('_error');
			} else {
				secc_n = true;
			}

            if(phone == ''){
				secc_p = false;
				$(".form__input-item._phone").addClass('_error');
			} else {
				secc_p = true;
			}

            if (secc_p && secc_p) {	
                console.log('secc');			
                $.ajax({
					type: "POST",
					url: 'send.php',
					data: $(this).serialize(),
					success: function (data) {
                        $('form.form__form ._thank').removeClass('disable');

					},
				});
            }
        });
    });
</script>


<?/*----------------------------send.php----------------------------*/?>

<?
if (empty($_POST['pass'])) {    //проверкаа скртыого поля 
    if(empty($errors)){   
        $message .= '
            <table>
                <tr style="background-color:#034D91;color:#fff;">
                    <th colspan="2" style="padding:15px;font-size:18px;">
                        Заявка с формы "Остались вопросы?" с сайта Autodepo71
                    </th>
                </tr>
                <tr style="background-color:#dfe4ea">
                    <td style="padding:15px;">Имя пользователя:</td>
                    <td style="padding:15px;">'.$_POST['name'].'</td>
                </tr>
                <tr style="background-color:#dfe4ea">
                    <td style="padding:15px;">Контактный телефон пользователя:</td>
                    <td style="padding:15px;">'.$_POST['phone'].'</td>
                </tr>
        ';
        if (!empty($_POST['email'])) {
            $message .= '
                <tr style="background-color:#dfe4ea">
                    <td style="padding:15px;">E-mail пользователя:</td>
                    <td style="padding:15px;">'.$_POST['email'].'</td>
                </tr>
            ';
        }
        if (!empty($_POST['services'])) {
            $message .= '
                <tr style="background-color:#dfe4ea">
                    <td style="padding:15px;">Услуга:</td>
                    <td style="padding:15px;">'.$_POST['services'].'</td>
                </tr>
            ';
        }
        if (!empty($_POST['comment'])) {
            $message .= '
                <tr style="background-color:#dfe4ea">
                    <td style="padding:15px;">Комментарий:</td>
                    <td style="padding:15px;">'.$_POST['comment'].'</td>
                </tr>
            ';
        }
        $message .= '</table>';
        $mailTo = "klim.vya@gmail.com"; // Ваш e-mail
        $subject = "Заявка с сайта";    // Тема сообщения
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: autodepo71.ru <info@autodepo71.ru>\r\n";

        if(mail($mailTo, $subject, $message, $headers)) {
            echo    //вывод спасибки  
                '
               
                '; 
        } 
    }
}
?>
