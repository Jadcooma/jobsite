<x-layout>
    <header class="my-6">
        <div class="text-center text-xl">
            Vind hier uw volgende droomjob!
        </div>
    </header>
    <main class="mt-6">
        @if (session()->has('success'))
        <div class="text-center font-bold text-green-500 mx-auto mb-2">
            {{ session('success')}}
        </div>
        @endif
        <x-jobs :jobs="$jobs" :favorites="$favorites" />
    </main>

    @if(auth()->user())
    <script>
        $('.jobs-container')
            .on("click", "[data-mode='Create']", function(event) {
                let job_id = event.target.getAttribute('data-job-id');
                console.log("create with job_id:", job_id)
                CreateFavorite(job_id);
            })
            .on("click", "[data-mode='Delete']", function() {
                let favorite_id = event.target.getAttribute('data-favorite-id');
                console.log("delete with favorite_id:", favorite_id);
                DeleteFavorite(favorite_id);
            });

        const CreateFavorite = (job_id) => {
            $.ajax({
                type: "GET",
                url: "favorite/create",
                context: $("[data-job-id=" + job_id + "]"),
                data: {
                    user_id: <?php echo auth()->user()->id ?>,
                    job_id: job_id
                }
            }).done(function(response) {
                $(this)
                    .html('&#10060')
                    .attr('data-mode', 'Delete')
                    .attr('data-favorite-id', response.id)
                    // .off("click")
                    // .on("click", function() {
                    //     DeleteFavorite(response.id)})
                
                alert("favoriet aangemaakt!")
            }).fail(function(request, status, message) {
                alert(status + ": " + message);
            });
        }

        const DeleteFavorite = (favorite_id) => {
            $.ajax({
                type: "GET",
                url: "favorite/delete/" + favorite_id,
                context: $("[data-favorite-id=" + favorite_id + "]"),
                error: function(request, status, message) {
                    alert(status + " : " + message);
                }
            }).done(function(response) {
                // If deletion of favourite job is succesfull: change function of button to Create Favorite
                $(this)
                    .html('&#11088')
                    .attr('data-mode', 'Create')
                    .removeAttr('data-favorite-id')
                    // .off()
                    // .on("click", function() {
                    //     CreateFavorite(response.job_id)});
                alert("favoriet verwijderd!");
            }).fail(function(request, status, message) {
                alert(status + ": " + message);
            })
        }
    </script>
    @endif
</x-layout>