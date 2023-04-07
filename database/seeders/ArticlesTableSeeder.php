<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s1 = new \App\Models\Articles([
            'newsletter_id' => 1,
            'title' => "Vancouver's March home sales down 42.5% from a year ago: B.C. board",
            'description' => "The Real Estate Board of Greater Vancouver says home sales fell 42.5 per cent in March from a year ago and were 28.4 per cent below the 10-year seasonal average.

            Last month's sales totalled 2,535 compared with 4,405 sales in March 2022 and 1,808 in February.
            
            The B.C. board says the numbers signal that March home sales are making a stronger than expected spring showing so far, despite elevated borrowing costs.
            
            It also found there were 4,317 new listings, a 35.5 per cent decrease from March 2022 and 22.3 per cent below the 10-year seasonal average.",
            'picUrl' => "https://bc.ctvnews.ca/content/dam/ctvnews/en/images/2022/8/3/-new-cycle--in-vancouver-real-estate-1-6012982-1659554999722.jpg",
            'position' => 'Left'
        ]);
        $s1->save();

        $s2 = new \App\Models\Articles([
            'newsletter_id' => 1,
            'title' => "Coastal Health braces for Vancouver police to move in on DTES street camps",
            'description' => "Vancouver Coastal Health is warning that police action against people living in tents along East Hastings Street will disrupt health services in the coming days or weeks, according to a safety bulletin sent to its staff in the Downtown Eastside.

            Article content
            The notification on Monday evening came hours after a leaked City of Vancouver document outlined plans to clear all street residents and makeshift structures off of East Hastings Street from Dunlevy to Carrall.
            Stage 2 of that plan called for a VPD-led clearing of so-called “high risk” encampments that are largely concentrated in the 0-to-400 block of Hastings Street — the blocks highlighted for service disruptions in Coastal Health’s safety bulletin.
            Language used in the bulletin to staff suggested that Coastal Health did not expect to not be informed about the exact timing and location of police actions.
            We are anticipating services along Hastings (potentially anywhere from Abbott to Gore) needing to move into some exceptional operations for essential services at points over the next week or two,” the bulletin read. “This may include a formal email/signal notification or it may happen informally and quickly.",
            'picUrl' => "https://smartcdn.gprod.postmedia.digital/vancouversun/wp-content/uploads/2023/04/png0404ndtes-03.jpg?quality=90&strip=all&w=1128&h=846&type=webp&sig=jCHKvbIDHsmA_eudS5yvMQ",
            'position' => 'Right'
        ]);
        $s2->save();

        $s2 = new \App\Models\Articles([
            'newsletter_id' => 2,
            'title' => "WEEKEND BOX OFFICE RESULTS: DUNGEONS & DRAGONS DETHRONES JOHN WICK",
            'description' => "March has ended. None of its sequels lasted longer than a single week at No. 1 due to competition, and the latest franchise attempt is likely to suffer the same fate next week as a new video game adaptation takes over. Nevertheless, March produced three $100+ million grossers, two of which are headed over $150 million and one that’s still shooting for $200 million. Will they be joined by a fourth? The new Dungeons & Dragons film certainly has its supporters from both its fandom and even critics, but its opening numbers likely aren’t impressing those who put up the dough for it.
            So what are we to make of a $38.5 million weekend by Dungeons & Dragons: Honor Among Thieves? Fans of number-watching got excited on Friday morning when some reported a $5.6 million take in Thursday previews. Those would have been the best Thursday numbers of the year. Alas, those reports buried the lede that $1.5 million of that was from earlier previews. Thus the potential estimates for a huge weekend were dashed. Still, those are better numbers than Shazam! Fury of the Gods, right? Well, yes and no.

Yes, $38.5 million is a higher number than the $30 million that DC dud limped out of the gate with (and certainly higher than the $33.9 million the 2000 attempt at this franchise made – and that’s globally). On the other hand, an extra $8.5 million is not much to write home about when your film costs anywhere from $26-41 million more than one that is already poised to be one of the biggest bombs of 2023. It’s all up to fans now to spread word of mouth, especially overseas where this film really needs to be saved.

The numbers this weekend put Honor Among Thieves behind the company of three late March releases – Ready Player One ($41.7 million opening), G.I. Joe: Retaliation ($40.5 million), and 2017’s Power Rangers ($40.3 million). That latter comes up a lot when measuring franchise failures, as it barely doubled its opening weekend towards a $85.3 million gross. Spielberg’s film and the G.I. Joe sequel domestically grossed $137.6 million and $122.5 million, respectively. They also had solid international hauls of $445.2 million and $253.2 million. Yet, with their budgets of $175 million & $130 million, they were still considered disappointments overall. Somewhere in there are the numbers that the $151 million-budgeted D&D needs to turn a theatrical profit; so far, it has grossed just $71.5 million worldwide.
John Wick: Chapter 4 fell 61.8% in its second weekend down to $28.2 million; that’s just a bit over Chapter 3’s $24.5 million over its second frame. Currently, the fourth chapter is at $122.8 million and about $21 million ahead of its predecessor’s pace. Chapter 3 ultimately finished with $171 million, putting the new film on a very narrow path to $200 million. If it wants to keep chugging ahead of the last film’s pace, it will need to earn at least around $15 million next week. Chapter 4 now owns the 12th-best 10-day total for a film released in March, but it’s also behind the pace of Jordan Peele’s Us, which had a $33.2 million second outing and $127.8 million after 10 days to finish with $175 million. Us dropped off further in weekend three, so if the word of mouth is out there, Wick can push further, but right now it’s looking like it will land somewhere between $180-195 million. In the meantime, it is over $245 million worldwide.",
            'picUrl' => "https://www.gamespot.com/a/uploads/scale_landscape/1562/15626911/4071764-untitled-1.jpg",
            'position' => 'Left'
        ]);
        $s2->save();
    }
}
