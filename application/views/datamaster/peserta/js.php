<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        data: {
            type: 'remote',
            source: {
                read: {
                    url: `<?php echo base_url("api/datamaster/peserta"); ?>`,
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            saveState: {
                cookie: false,
                webstorage: false
            },
        },
        sortable: true,
        pagination: true,
        search: {
            input: $('#generalSearch'),
        },
        columns: [{
                title: 'Name'
            },
            {
                title: 'Position'
            },
            {
                title: 'Office'
            },
            {
                title: 'Extn.'
            },
            {
                title: 'Start date'
            },
            {
                title: 'Salary'
            },
        ],
    });
});
</script>