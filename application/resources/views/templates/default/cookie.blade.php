@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="login-area py-60">
        <div class="container">
            <div class="row">
                <div class="single-terms mb-30 wyg">
                    @php
                        echo $cookie->data_values->description;
                    @endphp
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .wyg h1,
        h2,
        h3,
        h4 {
            color: hsl(var(--white)/0.8);
        }

        .wyg strong {
            color: hsl(var(--white)/0.8);
        }

        .wyg p {
            color: hsl(var(--white)/0.7);
        }

        .wyg ul {
            margin-left: 40px
        }

        .wyg ol {
            margin-left: 40px
        }

        .wyg ul li {
            list-style-type: disc;
            color: hsl(var(--white)/0.7) !important;
        }

        .wyg ol li {
            list-style-type: disc;
            color: hsl(var(--white)/0.7) !important;
        }
    </style>
@endpush
