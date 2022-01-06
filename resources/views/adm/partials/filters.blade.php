<script>

    $("#search_country").select2();

    $('#btnSearch').click(function() {
        $(this).find('i').toggleClass('fas fa-angle-down fas fa-angle-up');
    });

    let URL = 'admin/players?';

    // Campo de busca
    $('#search_form').on('submit', function (e) {
        e.preventDefault();

        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += '&' + $('#search_form').serialize();
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Países
    $('#search_country').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&country=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Idade
    $('#search_age').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&age=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Sexo
    $('#search_sex').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&sex=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Contrato
    $('#search_contract').on('change', function() {

        @if (session('name'))    URL += '&name='    + '{{ session('name')    }}'; @endif
        @if (session('country')) URL += '&country=' + '{{ session('country') }}'; @endif
        @if (session('age'))     URL += '&age='     + '{{ session('age')     }}'; @endif
        @if (session('sex'))     URL += '&sex='     + '{{ session('sex')     }}'; @endif
        @if (session('pass'))    URL += '&pass='    + '{{ session('pass')    }}'; @endif
        @if (session('role1'))   URL += '&role1='   + '{{ session('role1')   }}'; @endif
        @if (session('role2'))   URL += '&role2='   + '{{ session('role2')   }}'; @endif
        @if (session('force'))   URL += '&force='   + '{{ session('force')   }}'; @endif
        @if (session('league'))  URL += '&league='  + '{{ session('league')  }}'; @endif

        URL += (this.value) ? '&contract=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Valor de passe
    $('#search_pass').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&pass=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Posição primária
    $('#search_role1').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&role1=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Posição secundária
    $('#search_role2').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&role2=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Força
    $('#search_force').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('league'))   URL += '&league='   + '{{ session('league')   }}'; @endif

        URL += (this.value) ? '&force=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // Liga
    $('#search_league').on('change', function() {

        @if (session('name'))     URL += '&name='     + '{{ session('name')     }}'; @endif
        @if (session('country'))  URL += '&country='  + '{{ session('country')  }}'; @endif
        @if (session('age'))      URL += '&age='      + '{{ session('age')      }}'; @endif
        @if (session('sex'))      URL += '&sex='      + '{{ session('sex')      }}'; @endif
        @if (session('contract')) URL += '&contract=' + '{{ session('contract') }}'; @endif
        @if (session('pass'))     URL += '&pass='     + '{{ session('pass')     }}'; @endif
        @if (session('role1'))    URL += '&role1='    + '{{ session('role1')    }}'; @endif
        @if (session('role2'))    URL += '&role2='    + '{{ session('role2')    }}'; @endif
        @if (session('force'))    URL += '&force='    + '{{ session('force')    }}'; @endif

        URL += (this.value) ? '&league=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

</script>
