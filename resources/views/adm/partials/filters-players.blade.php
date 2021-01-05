
<script>

    let URL = 'players?page={{ session('page') }}';

    $("#perpage").select2({ minimumResultsForSearch: Infinity });
    $("#search_nationality").select2();
    $("#search_age").select2({ minimumResultsForSearch: Infinity });
    $("#search_sex").select2({ minimumResultsForSearch: Infinity });
    $("#search_pass").select2({ minimumResultsForSearch: Infinity });
    $("#search_role").select2({ minimumResultsForSearch: Infinity });
    $("#search_force").select2({ minimumResultsForSearch: Infinity });
    $("#search_contract").select2({ minimumResultsForSearch: Infinity });
    $("#search_league_id").select2({ minimumResultsForSearch: Infinity });
    $("#search_secondary_role").select2({ minimumResultsForSearch: Infinity });

    $('#btnSearch').click(function() {
        $(this).find('i').toggleClass('fas fa-angle-down fas fa-angle-up');
    });

    // Filtro de quantidade de registros por página
    $('#perpage').on('change', function() {

        // @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += '&pp=' + this.value;
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    $('#search_form').on('submit', function (e) {
        e.preventDefault();

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        // @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += '&' + $('#search_form').serialize();
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    $('#search_nationality').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        // @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&nationality=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    $('#search_age').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        // @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&age=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    $('#search_sex').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        // @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&sex=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    $('#search_contract').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        // @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&contract=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });

    // PASS
    $('#search_pass').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        // @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&pass=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    // ROLE
    $('#search_role').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        // @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&role1=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    // SECONDARY ROLE
    $('#search_secondary_role').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        // @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&role2=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    // FORCE
    $('#search_force').on('change', function() {

        @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        // @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        // @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif

        URL += (this.value) ? '&force=' + this.value : '';
        window.location.href = "{!!  url('" + URL + "') !!}";
    });
    // $('#search_league_id').on('change', function() {
        // @if (session('pp'))          URL += '&pp='          + '{{ session('pp')          }}'; @endif
        // @if (session('name'))        URL += '&name='        + '{{ session('name')        }}'; @endif
        // @if (session('nationality')) URL += '&nationality=' + '{{ session('nationality') }}'; @endif
        // @if (session('age'))         URL += '&age='         + '{{ session('age')         }}'; @endif
        // @if (session('sex'))         URL += '&sex='         + '{{ session('sex')         }}'; @endif
        // @if (session('contract'))    URL += '&contract='    + '{{ session('contract')    }}'; @endif
        // @if (session('pass'))        URL += '&pass='        + '{{ session('pass')        }}'; @endif
        // @if (session('role1'))       URL += '&role1='       + '{{ session('role1')       }}'; @endif
        // @if (session('role2'))       URL += '&role2='       + '{{ session('role2')       }}'; @endif
        // @if (session('force'))       URL += '&force='       + '{{ session('force')       }}'; @endif
        @if (session('league_id'))   URL += '&league_id='   + '{{ session('league_id')   }}'; @endif
    //     URL += (this.value) ? '&league_id=' + this.value : '';
    //     window.location.href = "{!!  url('" + URL + "') !!}";
    // });

</script>