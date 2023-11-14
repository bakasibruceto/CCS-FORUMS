<x-app-layout>
    <div class="pt-20">
        Forum > title
    </div>
    <div>
        profilepic name timestamp tags triple dot
    </div>
    <div>
        content
        <br>
        <br>
        last updated
        <br>
        <br>
        likes
    </div>
    {{-- foreach --}}
    {{-- replies --}}
    <div>
        {{-- if reply is marked as solution include checkmark --}}
        profilepic name timestamp tags triple checkmark solution dot
    </div>
    <div>
        content
        <br>
        <br>
        last updated
        <br>
        <br>
        likes Solution selected by @ moderater
    </div>
    <div>
        Write a replay
        <div>
            write preview
        </div>
        <div>
            textbox
        </div>
        <div>
            reply button
        </div>
    </div>
</x-app-layot>
