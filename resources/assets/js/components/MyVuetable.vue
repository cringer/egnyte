<template>
    <div class="container">
        <vuetable ref="vuetable"
            api-url="https://vuetable.ratiw.net/api/users"
            :fields="fields"
            pagination-path=""
            :css="css"
            @vuetable:pagination-data="onPaginationData"
        ></vuetable>
        <div class="vuetable-pagination">
            <vuetable-pagination-info ref="paginationInfo"
            ></vuetable-pagination-info>

            <vuetable-pagination ref="pagination"
                @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
    import accounting from 'accounting'
    import moment from 'moment'

    export default {
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo
        },
        data (){
            return {
                fields: [
                    {
                        name: '__sequence',
                        title: '#',
                        titleClass: 'text-right',
                        dataClass: 'text-right'
                    },
                    {
                        name: 'name',
                        sortField: 'name'
                    },
                    {
                        name: 'email',
                        sortField: 'email'
                    },
                    {
                        name: 'age',
                        sortField: 'birthdate',
                        dataClass: 'text-center'
                    },
                    {
                        name: 'birthdate',
                        sortField: 'birthdate',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        callback: 'formatDate|DD-MM-YYYY'
                    },
                    {
                        name: 'nickname',
                        sortField: 'nickanme',
                        callback: 'allcap'
                    },
                    {
                        name: 'gender',
                        sortField: 'gender',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        callback: 'genderLabel'
                    },
                    {
                        name: 'salary',
                        sortField: 'salary',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        callback: 'formatNumber'
                    }
                ],
                css: {
                    tableClass: 'table table-bordered table-striped table-hover',
                    ascendingIcon: 'glyphicon glyphicon-chevron-up',
                    descendingIcon: 'glyphicon glyphicon-chevron-down'
                },
                sortOrder: [
                    {
                        field: 'email',
                        sortField: 'email',
                        direction: 'asc'
                    }
                ],
            }
        },
        methods: {
            allcap (value) {
                return value.toUpperCase()
            },
            genderLabel (value) {
                return value == 'M'
                    ? '<span class="label label-info"><i class="glyphicon glyphicon-star"></i> Male</span>'
                    : '<span class="label label-success"><i class="glyphicon glyphicon-heart"></i> Female</span>'
            },
            formatNumber (value) {
                return accounting.formatNumber(value, 2)
            },
            formatDate (value, fmt = 'D MMM YYYY') {
                return (value == null)
                    ? ''
                    : moment(value, 'YYYY-MM-DD').format(fmt)
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            }
        }
    }
</script>
