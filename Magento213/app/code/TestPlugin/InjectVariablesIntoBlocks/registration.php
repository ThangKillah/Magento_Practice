<?php

use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'TestPlugin_InjectVariablesIntoBlocks',
    __DIR__
);
