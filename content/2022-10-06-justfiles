# Justfiles are cool

I have to say that justfile might be my new favourite multi-lingual build tool. 
They allow you to use multiple languages within instructions, variables, are less sensitive to tabs, and have some really nice documentation.

For example a justfile that looks like:

```
# build docs
build:
    quarto render

```

Would print the following

```
just --list
> build # build docs
```

This is super handy when you have a ton of build instructions.
Importantly there are github actions runners available so they can be used to orchestrate build steps.
See the [git repo](https://github.com/casey/just) for more information. 
Additionally, I have a neat justfile [here](https://github.com/medewitt/quarto-blog/blob/main/justfile).
