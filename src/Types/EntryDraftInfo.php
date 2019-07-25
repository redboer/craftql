<?php

namespace markhuot\CraftQL\Types;

use craft\behaviors\DraftBehavior;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\EnumType;
use GraphQL\Type\Definition\Type;
use markhuot\CraftQL\Builders\Schema;

class EntryDraftInfo extends Schema {

    function boot() {
        $this->addIntField('draftId');
        $this->addStringField('name')
            ->resolve(function ($root, $args) {
                /** @var DraftBehavior $root */
                return $root->draftName;
            });
        $this->addStringField('notes')
            ->resolve(function ($root, $args) {
                /** @var DraftBehavior $root */
                return $root->draftNotes;
            });
    }

}
