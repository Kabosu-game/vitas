@php use App\Enums\InvestStatus; @endphp
@extends('backend.layouts.app')
@section('title')
    {{ __('Admin Dashboard') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ setting('site_title', 'global') }} {{ __('Dashboard') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            {{-- ═══ QUICK ACCESS ADMIN ═══ --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title"><i data-lucide="zap" style="width:16px;height:16px;margin-right:6px;vertical-align:middle;color:#f59e0b"></i>{{ __('Quick Access') }}</h3>
                        </div>
                        <div class="site-card-body" style="padding:20px">
                            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:12px;">

                                @can('customer-list')
                                <a href="{{ route('admin.user.index') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(79,70,229,.1);color:#4f46e5;display:flex;align-items:center;justify-content:center;"><i data-lucide="users" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('All Customers') }}</span>
                                </a>
                                @endcan

                                @can('customer-create')
                                <a href="{{ route('admin.user.new') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(16,185,129,.1);color:#10b981;display:flex;align-items:center;justify-content:center;"><i data-lucide="user-plus" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Add Customer') }}</span>
                                </a>
                                @endcan

                                @canany(['kyc-list','kyc-action'])
                                <a href="{{ route('admin.kyc.pending') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(245,158,11,.1);color:#f59e0b;display:flex;align-items:center;justify-content:center;"><i data-lucide="check-square" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Pending KYC') }}</span>
                                </a>
                                @endcanany

                                @can('transaction-list')
                                <a href="{{ route('admin.transactions') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(99,102,241,.1);color:#6366f1;display:flex;align-items:center;justify-content:center;"><i data-lucide="cast" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Transactions') }}</span>
                                </a>
                                @endcan

                                <a href="{{ route('admin.loan-request.index') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(239,68,68,.1);color:#ef4444;display:flex;align-items:center;justify-content:center;"><i data-lucide="banknote" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Loan Requests') }}</span>
                                </a>

                                @canany(['withdraw-list','withdraw-action'])
                                <a href="{{ route('admin.withdraw.pending') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(14,165,233,.1);color:#0ea5e9;display:flex;align-items:center;justify-content:center;"><i data-lucide="landmark" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Pending Withdraws') }}</span>
                                </a>
                                @endcanany

                                <a href="{{ route('admin.notification.all') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(251,191,36,.1);color:#f59e0b;display:flex;align-items:center;justify-content:center;"><i data-lucide="megaphone" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Notifications') }}</span>
                                </a>

                                @canany(['support-ticket-list','support-ticket-action'])
                                <a href="{{ route('admin.ticket.index') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(168,85,247,.1);color:#a855f7;display:flex;align-items:center;justify-content:center;"><i data-lucide="wrench" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Support Tickets') }}</span>
                                </a>
                                @endcanany

                                @can('site-setting')
                                <a href="{{ route('admin.settings.site') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(156,163,175,.15);color:#6b7280;display:flex;align-items:center;justify-content:center;"><i data-lucide="settings" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Site Settings') }}</span>
                                </a>
                                @endcan

                                @can('clear-cache')
                                <a href="{{ route('admin.clear-cache') }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:12px;background:#f8fafc;border:1px solid rgba(0,0,0,.07);text-decoration:none;color:#374151;transition:all .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.1)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
                                    <div style="width:44px;height:44px;border-radius:12px;background:rgba(239,68,68,.08);color:#dc2626;display:flex;align-items:center;justify-content:center;"><i data-lucide="trash-2" style="width:20px;height:20px"></i></div>
                                    <span style="font-size:12px;font-weight:600;text-align:center">{{ __('Clear Cache') }}</span>
                                </a>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ═══ FIN QUICK ACCESS ═══ --}}

            <div class="row">
                @include('backend.include.__action')
                @include('backend.include.__data_card')
                @can('site-statistics-chart')
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Site Statistics') }}</h3>
                                <div class="card-header-links">
                                    <input class="card-header-input" type="text" name="site_daterange" value="{{ $data['start_date'] .' - '. $data['end_date'] }}" />
                                </div>
                            </div>
                            <div class="site-card-body">
                                <canvas id="statisticsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                @can('fund-transfer-statistics')
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Fund Transfer Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="fundTransferChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                @can('top-country-statistics')
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Top Country Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="countryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                @can('top-browser-statistics')
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Top Browser Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="browserChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                @can('top-os-statistics')
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Top OS Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="osChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                @can('latest-users')
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">{{ __('Latest Users') }}</h3>
                        </div>
                        <div class="site-card-body table-responsive">
                            <div class="site-datatable">
                                <table class="data-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Avatar') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Balance') }}</th>
                                        <th>{{ __('KYC') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['latest_user'] as $user)
                                        <tr>
                                            <td>
                                                @include('backend.user.include.__avatar', ['avatar' => $user->avatar, 'first_name' => $user->first_name, 'last_name' => $user->last_name])
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.edit',$user->id) }}"
                                                   class="link">{{ Str::limit($user->username,15) }}
                                                </a>
                                            </td>
                                            <td>
                                                <strong>{{ Str::limit($user->email,20) }}</strong>
                                            </td>
                                            <td><strong>{{ $currencySymbol . $user->balance }}</strong></td>
                                            <td>
                                                @if($user->kyc == 1)
                                                    <div class="site-badge success">{{ __('Verified') }}</div>
                                                @else
                                                    <div class="site-badge pending">{{ __('Unverified') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->status == 1)
                                                    <div class="site-badge success">{{ __('Active') }}</div>
                                                @else
                                                    <div class="site-badge danger">{{ __('DeActivated') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                @include('backend.user.include.__action', ['user' => $user,'delete_hidden' => true])
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="centered">
                                        <td colspan="7">
                                            @if($data['latest_user']->isEmpty())
                                                {{ __('No Data Found') }}
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                @endcan

            </div>

        </div>
    </div>
    <!-- Modal for Send Email -->
    @include('backend.user.include.__mail_send')
    <!-- Modal for Send Email-->

@endsection
@section('script')
    @include('backend.include.__chartjs')
    <script>
        (function ($) {
            'use strict'
            //send mail modal form open
            $('body').on('click', '.send-mail', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name').html(name);
                $('#userId').val(id);
                $('#sendEmail').modal('toggle')
            })

            // Delete
            $('body').on('click', '#deleteModal', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');

                $('#data-name').html(name);
                var url = '{{ route("admin.user.destroy", ":id") }}';
                url = url.replace(':id', id);
                $('#deleteForm').attr('action', url);
                $('#delete').modal('toggle')

            });
        })(jQuery)
    </script>
@endsection
